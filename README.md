npm install --save-dev eslint eslint-plugin-vue

    then create .eslintrc.js and past 
     module.exports = {
  extends: ['eslint:recommended', 'plugin:vue/vue3-recommended'],
  parserOptions: {
    ecmaVersion: 2020,
    sourceType: 'module',
  },
  env: {
    amd: true,
    browser: true,
    es6: true,
  },
  rules: {
    indent: ['error', 2],
    quotes: ['warn', 'single'],
    semi: ['warn', 'never'],
    'no-unused-vars': ['error', { vars: 'all', args: 'after-used', ignoreRestSiblings: true }],
    'comma-dangle': ['warn', 'always-multiline'],
    'vue/multi-word-component-names': 'off',
    'vue/max-attributes-per-line': 'off',
    'vue/no-v-html': 'off',
    'vue/require-default-prop': 'off',
    'vue/singleline-html-element-content-newline': 'off',
    'vue/html-self-closing': [
      'warn',
      {
        html: {
          void: 'always',
          normal: 'always',
          component: 'always',
        },
      },
    ],
    'vue/no-v-text-v-html-on-component': 'off',
  },


## npm run fix:eslint

Step #1
install debug laravel
[Clicke here ](https://github.com/barryvdh/laravel-debugbar)

Step #2
instll Ide helper
https://github.com/barryvdh/laravel-ide-helper


Step #
install tailwindcss-forms for forms 
[Tailwindcss Forms ]https://github.com/tailwindlabs/tailwindcss-forms


Step #
install tailwindcss-forms for forms 
[values returns a string with a language-sensitive representation of this number. ]https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number/toLocaleString



sudo chmod -R 777 /home/nehad/Laravel/master-laravel-\&-vuejs-fullstack/listings




sail artisan cache:clear
sail artisan view:clear
sail artisan route:clear
sail artisan clear-compiled
sail artisan config:cache