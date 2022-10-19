Nova.booting((app, store) => {
  Nova.inertia('NovaBackNavigation', require('./pages/Tool').default)
//   app.component('Heading', require('./components/Heading').default)
  app.component('Card', require('./components/Card').default)
})
