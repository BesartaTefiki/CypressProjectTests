describe('Laravel Application Test', () => {
  it('Visits the Laravel application', () => {
    cy.visit('/')
    cy.contains('Home', { timeout: 10000 })  
  })
})
