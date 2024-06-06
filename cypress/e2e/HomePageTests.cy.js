describe('Home Page Additional Tests', () => {
  beforeEach(() => {
    
    cy.visit('/')
  })

  it('Checks for the presence of the Beauty & SPA Center heading', () => {
    cy.contains('h1', 'Beauty & SPA Center').should('be.visible')
  })

  it('Checks if the background image is applied', () => {
    cy.get('.container').should('have.attr', 'style', "background-image: url('images/lotion.jpg');")
  })

  it('Checks if the "Book Your Appointment" button is present and clickable', () => {
    cy.contains('a', 'Book Your Appointment').should('be.visible').click()
    cy.url().should('include', '/appointments/step-one')
    cy.go('back') 
  })

  it('Checks for the presence of the Nails Image', () => {
    cy.get('img[alt="Nails Image"]').should('be.visible')
  })

  it('Checks for the presence of the "Step into a world of elegance and luxury" heading', () => {
    cy.contains('h2', 'Step into a world of elegance and luxury.').should('be.visible')
  })

  it('Checks for the presence of the text about Erbora\'s Beauty', () => {
    cy.get('.space-y-4 > p').contains('Established in 2024').should('be.visible')
  })

  it('Checks for the presence of the "Let us make it shine at Erbora\'s Beauty" heading', () => {
    cy.contains('h2', 'Let us make it shine at Erbora\'s Beauty').should('be.visible')
  })

  it('Checks for the presence of the paragraph about Erbora\'s Beauty', () => {
    cy.get('.leading-loose').contains('At Erbora\'s Beauty, we believe in the transformative power of beauty. Established in 2024').should('be.visible')
  })

  it('Checks if the "Discover our Services & Products" button is present and clickable', () => {
    cy.contains('a', 'Discover our Services & Products').should('be.visible').click()
    cy.url().should('include', '/services')
    cy.go('back') 
  })

  it('Checks for the presence of the Hair Image', () => {
    cy.get('img[alt="Hair Image"]').should('be.visible')
  })
})
