/**
 * Stand-in for Google's reCAPTCHA, so the browser tests can exercise the real
 * validation path without reaching the internet.
 *
 *  GET /recaptcha.js  — the widget script the theme pages load; its execute()
 *                       hands back a token the stub below accepts.
 *  POST /siteverify   — what the server-side ReCaptcha rule calls. Only the
 *                       token the widget produces is approved, so the tests
 *                       can also drive the rejection path.
 *  GET /healthz       — readiness probe for Playwright's webServer.
 */
const http = require('node:http');

const PORT = Number(process.env.RECAPTCHA_STUB_PORT || 8199);
const VALID_TOKEN = 'e2e-valid-token';

const server = http.createServer((request, response) => {
    if (request.url.startsWith('/recaptcha.js')) {
        response.writeHead(200, { 'content-type': 'application/javascript' });
        response.end(
            `window.grecaptcha = {` +
            `  ready: function (callback) { callback(); },` +
            `  execute: function () { return Promise.resolve('${VALID_TOKEN}'); }` +
            `};`,
        );

        return;
    }

    if (request.url.startsWith('/siteverify')) {
        let body = '';

        request.on('data', (chunk) => { body += chunk; });
        request.on('end', () => {
            const token = new URLSearchParams(body).get('response');

            response.writeHead(200, { 'content-type': 'application/json' });
            response.end(JSON.stringify({
                success: token === VALID_TOKEN,
                score: token === VALID_TOKEN ? 0.9 : 0.1,
            }));
        });

        return;
    }

    if (request.url.startsWith('/healthz')) {
        response.writeHead(200, { 'content-type': 'text/plain' });
        response.end('ok');

        return;
    }

    response.writeHead(404, { 'content-type': 'text/plain' });
    response.end('not found');
});

server.listen(PORT, '127.0.0.1', () => {
    console.log(`reCAPTCHA stub listening on http://127.0.0.1:${PORT}`);
});
