import fs from 'fs'
import path from 'path'
import dotenv from 'dotenv'

import { defaultTheme, viteBundler } from 'vuepress'

dotenv.config()

const hostname = 'attributes.laravel-lang.com';

module.exports = {
    lang: 'en-US',
    title: 'Laravel Lang: Attributes',
    description: 'List of 78 languages for form field names',

    head: [
        ['link', { rel: 'icon', href: '/images/logo.svg' }],
        ['meta', { name: 'twitter:image', content: 'https://attributes.laravel-lang.com/images/social-logo.png' }]
    ],

    bundler: viteBundler(),

    theme: defaultTheme({
        hostname,
        base: '/',

        logo: `https://${ hostname }/images/logo.svg`,

        repo: 'https://github.com/Laravel-Lang/attributes',
        repoLabel: 'GitHub',
        docsRepo: 'https://github.com/Laravel-Lang/attributes',
        docsBranch: 'main',
        docsDir: 'docs',

        contributors: false,
        editLink: true,

        navbar: [
            { text: 'Translations Status', link: '/status.md' }
        ],

        sidebarDepth: 1,

        sidebar: [
            {
                text: 'Getting Started',
                collapsible: true,
                children: [
                    {
                        text: 'Introduction',
                        link: '/'
                    },

                    {
                        text: 'Installation',
                        link: '/installation/',
                        collapsible: true,
                        children: [
                            '/installation/compatibility.md'
                        ]
                    },

                    { text: 'Basic Usage', link: '/usage.md' },

                    {
                        text: 'Translations Status',
                        link: '/status.md',
                        collapsible: true,
                        children: getChildren('statuses')
                    }
                ]
            }, {
                text: 'References',
                collapsible: true,
                children: [
                    { text: 'Referents', link: 'https://laravel-lang.com/referents.html' },
                    { text: 'Code of Conduct', link: 'https://laravel-lang.com/code-of-conduct.html' },
                    { text: 'Contributing', link: 'https://laravel-lang.com/contributing.html' }
                ]
            }
        ]
    }),

    plugins: []
};

function getChildren(folder, sort = 'asc') {
    const extension = ['.md'];
    const names = ['index.md', 'readme.md'];

    const dir = `${ __dirname }/../${ folder }`;

    return fs
        .readdirSync(path.join(dir))
        .filter(item =>
            fs.statSync(path.join(dir, item)).isFile() &&
            ! names.includes(item.toLowerCase()) &&
            extension.includes(path.extname(item))
        )
        .sort((a, b) => {
            a = resolveNumeric(a);
            b = resolveNumeric(b);

            if (a < b) return sort === 'asc' ? -1 : 1;
            if (a > b) return sort === 'asc' ? 1 : -1;

            return 0;
        }).map(item => `/${ folder }/${ item }`);
}

function resolveNumeric(value) {
    const sub = value.substring(0, value.indexOf('.'));

    const num = Number(sub);

    return isNaN(num) ? value : num;
}

