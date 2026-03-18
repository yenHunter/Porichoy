/**
 * Template Name: UBold - Admin & Dashboard Template
 * By (Author): Coderthemes
 * Module/App (File Name): Chart ApexTree
 */
import { ins } from '../app'
import ApexTree from 'apextree'

const fontFamily = getComputedStyle(document.body).fontFamily

// Shared node template
function basicNodeTemplate(content) {
    return `
    <div style='display: flex; flex-direction: row; gap:10px; align-items: center; height: 100%; box-shadow: 1px 2px 4px #ccc; padding: 0 15px;'>
        <img style='width: 50px; height: 50px; border-radius: 50%;' src='${content.imageURL}' alt=''>
        <div style="font-weight: 500; font-family: ${fontFamily}; font-size: 14px">${content.name}</div>
    </div>`;
}

function verticalNodeTemplate(content) {
    return `
    <div style='display: flex; flex-direction: column; gap: 10px; justify-content: center; align-items: center; height: 100%'>
        <img style='width: 50px; height: 50px; border-radius: 50%;' src='${content.imageURL}' alt=''/>
        <div style="font-weight: 500; font-family: ${fontFamily}; font-size: 14px">${content.name}</div>
    </div>`;
}

// Tree configurations
const sharedOptions = {
    contentKey: 'data',
    width: '100%',
    enableToolbar: false,
    nodeWidth: 170,
    nodeHeight: 70,
    childrenSpacing: 70,
    siblingSpacing: 30,
    fontColor: ins('light-text-emphasis'),
    nodeTemplate: basicNodeTemplate,
    nodeStyle: 'box-shadow: -3px 6px 8px -5px rgba(0,0,0,0.31)',
    edgeColorHover: ins('secondary'),
};

function renderApexTree(elementId, options, data) {
    const element = document.getElementById(elementId);
    if (element) {
        const tree = new ApexTree(element, options);
        tree.render(data);
    }
}

const data1 = {
    id: 'Lucas_Alex',
    data: {
        name: 'Lucas Alex',
        imageURL: '/images/users/user-1.jpg',
    },
    options: {
        nodeBGColor: ins('primary-rgb', 0.5),
    },
    children: [
        {
            id: 'Alex_Lee',
            data: {
                name: 'Alex Lee',
                imageURL: '/images/users/user-3.jpg',
            },
            options: {
                nodeBGColor: ins('danger-rgb', 0.5),
            },
            children: [
                {
                    id: 'Mia_Patel',
                    data: {
                        name: 'Mia Patel',
                        imageURL: '/images/users/user-9.jpg',
                    },
                    options: {
                        nodeBGColor: ins('info-rgb', 0.5),
                    },
                },
                {
                    id: 'Ryan_Clark',
                    data: {
                        name: 'Ryan Clark',
                        imageURL: '/images/users/user-10.jpg',
                    },
                    options: {
                        nodeBGColor: ins('info-rgb', 0.5),
                    },
                },
                {
                    id: 'Zoe_Wang',
                    data: {
                        name: 'Zoe Wang',
                        imageURL: '/images/users/user-2.jpg',
                    },
                    options: {
                        nodeBGColor: ins('info-rgb', 0.5),
                    },
                },
            ],
        },
        {
            id: 'Leo_Kim',
            data: {
                name: 'Leo Kim',
                imageURL: '/images/users/user-6.jpg',
            },
            options: {
                nodeBGColor: ins('danger-rgb', 0.5),
            },
            children: [
                {
                    id: 'Ava_Jones',
                    data: {
                        name: 'Ava Jones',
                        imageURL: '/images/users/user-3.jpg',
                    },
                    options: {
                        nodeBGColor: ins('purple-rgb', 0.5),
                    },
                },
                {
                    id: 'Maya_Gupta',
                    data: {
                        name: 'Maya Gupta',
                        imageURL: '/images/users/user-7.jpg',
                    },
                    options: {
                        nodeBGColor: ins('purple-rgb', 0.5),
                    },
                },
            ],
        },

        {
            id: 'Lily_Chen',
            data: {
                name: 'Lily Chen',
                imageURL: '/images/users/user-4.jpg',
            },
            options: {
                nodeBGColor: ins('danger-rgb', 0.5),
            },
            children: [
                {
                    id: 'Jake_Scott',
                    data: {
                        name: 'Jake Scott',
                        imageURL: '/images/users/user-3.jpg',
                    },
                    options: {
                        nodeBGColor: ins('secondary-rgb', 0.5),
                    },
                },
            ],
        },
        {
            id: 'Max_Ruiz',
            data: {
                name: 'Max Ruiz',
                imageURL: '/images/users/user-8.jpg',
            },
            options: {
                nodeBGColor: ins('danger-rgb', 0.5),
            },
        },
    ],
};

renderApexTree('right-to-left', {
    ...sharedOptions,
    direction: 'right',
}, data1);

renderApexTree('bottom-tree', {
    ...sharedOptions,
    direction: 'bottom'
}, data1);


const data2 = {
    id: 'ms',
    data: {
        imageURL: '/images/users/user-1.jpg',
        name: 'Margret Swanson',
    },
    options: {
        nodeBGColor: ins('primary-rgb', 0.5),
        nodeBGColorHover: ins('primary-rgb', 0.7),
    },
    children: [
        {
            id: 'mh',
            data: {
                imageURL: '/images/users/user-3.jpg',
                name: 'Mark Hudson',
            },
            options: {
                nodeBGColor: ins('danger-rgb', 0.5),
                nodeBGColorHover: ins('danger-rgb', 0.7),
            },
            children: [
                {
                    id: 'kb',
                    data: {
                        imageURL: '/images/users/user-2.jpg',
                        name: 'Karyn Borbas',
                    },
                    options: {
                        nodeBGColor: ins('info-rgb', 0.5),
                        nodeBGColorHover: ins('info-rgb', 0.7),
                    },
                },
                {
                    id: 'cr',
                    data: {
                        imageURL: '/images/users/user-9.jpg',
                        name: 'Chris Rup',
                    },
                    options: {
                        nodeBGColor: ins('purple-rgb', 0.5),
                        nodeBGColorHover: ins('purple-rgb', 0.7),
                    },
                },
            ],
        },
        {
            id: 'cs',
            data: {
                imageURL: '/images/users/user-7.jpg',
                name: 'Chris Lysek',
            },
            options: {
                nodeBGColor: ins('secondary-rgb', 0.5),
                nodeBGColorHover: ins('secondary-rgb', 0.7),
            },
            children: [
                {
                    id: 'Noah_Chandler',
                    data: {
                        imageURL: '/images/users/user-6.jpg',
                        name: 'Noah Chandler',
                    },
                    options: {
                        nodeBGColor: ins('info', 0.5),
                        nodeBGColorHover: ins('info', 0.7),
                    },
                },
                {
                    id: 'Felix_Wagner',
                    data: {
                        imageURL: '/images/users/user-4.jpg',
                        name: 'Felix Wagner',
                    },
                    options: {
                        nodeBGColor: ins('success-rgb', 0.5),
                        nodeBGColorHover: ins('success-rgb', 0.7),
                    },
                },
            ],
        },
    ],
};

renderApexTree('top-tree', {
    contentKey: 'data',
    width: '100%',
    nodeWidth: 150,
    nodeHeight: 100,
    fontColor: ins('light-text-emphasis'),
    edgeColorHover: ins('secondary'),
    childrenSpacing: 50,
    siblingSpacing: 20,
    direction: 'top',
    nodeTemplate: verticalNodeTemplate,
    enableToolbar: false
}, data2);

renderApexTree('collapse-expand', {
    contentKey: 'data',
    width: '100%',
    nodeWidth: 150,
    nodeHeight: 100,
    fontColor: ins('light-text-emphasis'),
    edgeColorHover: ins('secondary'),
    childrenSpacing: 50,
    siblingSpacing: 20,
    direction: 'top',
    nodeTemplate: verticalNodeTemplate,
    enableToolbar: false,
    enableExpandCollapse: true
}, data2);