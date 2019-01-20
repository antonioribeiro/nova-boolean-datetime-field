Nova.booting((Vue, router, store) => {
    Vue.component('index-boolean-datetime', require('./components/IndexField'))
    Vue.component(
        'detail-boolean-datetime',
        require('./components/DetailField'),
    )
    Vue.component('form-boolean-datetime', require('./components/FormField'))
})
