#!/usr/bin/env node

/**
 * Fails when package-lock.json contains a high or critical npm advisory.
 *
 * `npm audit --audit-level=high` cannot express exceptions, so the JSON report
 * is evaluated here instead. Every entry in ALLOWED names the GHSA ID and why
 * it is tolerated; anything else at high or critical exits non-zero.
 */

const { execSync } = require('node:child_process');

const ALLOWED = {
    // picomatch 4.0.7 is the newest release and the last affected version, so
    // there is no patched version to upgrade to yet. It is reached only through
    // build tooling (vite, fdir, tinyglobby, @parcel/watcher) and is not part of
    // the shipped bundle. Delete this entry once a picomatch > 4.0.7 installs.
    'GHSA-fc5q-39xc-vjpf': 'no patched picomatch release exists yet (4.0.7 is latest)',
};

const BLOCKING = new Set(['high', 'critical']);

let report;

try {
    report = JSON.parse(
        execSync('npm audit --package-lock-only --json', {
            encoding: 'utf8',
            maxBuffer: 32 * 1024 * 1024,
        }),
    );
} catch (error) {
    // npm exits non-zero whenever the report lists advisories; the JSON on
    // stdout is still the report we need.
    if (! error.stdout) {
        throw error;
    }

    report = JSON.parse(error.stdout);
}

const advisories = new Map();

for (const [name, vulnerability] of Object.entries(report.vulnerabilities || {})) {
    for (const via of vulnerability.via || []) {
        // A string entry names another vulnerable package instead of an advisory.
        if (typeof via === 'string' || ! via.url) {
            continue;
        }

        const id = via.url.split('/').pop();
        const advisory = advisories.get(id) || { severity: via.severity, packages: new Set() };
        advisory.packages.add(name);
        advisories.set(id, advisory);
    }
}

const failures = [];

for (const [id, advisory] of advisories) {
    const packages = [...advisory.packages].sort().join(', ');

    if (id in ALLOWED) {
        console.log(`allowed: ${id} (${advisory.severity}) ${packages} — ${ALLOWED[id]}`);

        continue;
    }

    if (BLOCKING.has(advisory.severity)) {
        failures.push(`${id} (${advisory.severity}) ${packages}`);
    }
}

if (failures.length) {
    console.error(`\nBlocking advisories:\n- ${failures.join('\n- ')}`);
    process.exit(1);
}

console.log('\nNo blocking npm advisories.');
