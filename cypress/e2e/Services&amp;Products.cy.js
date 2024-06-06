describe('Laravel Application Test', () => {
  beforeEach(() => {
    cy.visit('/')
  })

  it('Visits the Laravel application and checks for the header', () => {
    cy.contains("Erbora's beauty!").should('be.visible')
  })




  it('Checks if the Home navigation link is present and works', () => {
    cy.contains('Home').should('be.visible').click()
    cy.url().should('include', '/')
  })

  it('Checks if the Services & Products navigation link is present and works', () => {
    cy.contains('Services & Products').should('be.visible').click()
    cy.url().should('include', '/services')
  })

  it('Checks if the Book Your Appointment navigation link is present and works', () => {
    cy.contains('Book Your Appointment').should('be.visible').click()
    cy.url().should('include', '/appointments')
  })

  it('Checks if the Login navigation link is present and works', () => {
    cy.contains('Login').should('be.visible').click()
    cy.url().should('include', '/login')
  })

  it('Checks if the Register navigation link is present and works', () => {
    cy.contains('Register').should('be.visible').click()
    cy.url().should('include', '/register')
  })
})

describe('Appointment Booking Form Test', () => {
  beforeEach(() => {
    cy.visit('/appointments/step-one')
  })

  it('Checks if the form elements are visible', () => {
    cy.contains('Appointment Booking').should('be.visible')
    cy.get('input[name="first_name"]').should('be.visible')
    cy.get('input[name="last_name"]').should('be.visible')
    cy.get('input[name="email"]').should('be.visible')
    cy.get('input[name="tel_number"]').should('be.visible')
    cy.get('input[name="date"]').should('be.visible')
    cy.contains('Next').should('be.visible')
  })

  it('Fills out the first name in the appointment form', () => {
    cy.get('input[name="first_name"]').type('John')
  })

  it('Fills out the last name in the appointment form', () => {
    cy.get('input[name="last_name"]').type('Doe')
  })

  it('Fills out the email in the appointment form', () => {
    cy.get('input[name="email"]').type('john.doe@example.com')
  })

  it('Fills out the phone number in the appointment form', () => {
    cy.get('input[name="tel_number"]').type('1234567890')
  })

  it('Fills out the date in the appointment form', () => {
    cy.get('input[name="date"]').type('2024-12-31T10:00')
  })

  it('Clicks the Next button', () => {
    cy.contains('Next').click()
  })

 


  
})


