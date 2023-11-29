import './bootstrap';

import { createInertiaApp } from '@inertiajs/svelte'

createInertiaApp({
	resolve: name => {
		
		// console.log(name)
		
		const [module, page] = name.split('::');

		// console.log(page)
		// console.log(module)

		const pagePath = module
        ? `../../Modules/${module}/Resources/assets/js/Pages/${page}.svelte`
        : `./Pages/${page}.svelte`;

		// console.log(pagePath)

		const pages = module
        ? import.meta.glob('../../Modules/**/Resources/assets/js/Pages/**/*.svelte')
        : import.meta.glob('./Pages/**/*.svelte');

		// console.log(pages)

		if (!pages[pagePath]) {
			const errorMessage = `Page not found: ${pagePath}`;
			console.log(errorMessage);
			throw new Error(errorMessage);
		}

		return typeof pages[pagePath] === 'function' ? pages[pagePath]() : pages[pagePath];


		// const pages = import.meta.glob('./Pages/**/*.svelte', { eager: true })
		// return pages[`./Pages/${name}.svelte`]

	},
	setup({ el, App, props }) {
		new App({ target: el, props })
	},
})
