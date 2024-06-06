describe('Appointment Booking Form Tests', () => {
  beforeEach(() => {
    
    cy.visit('/appointments/step-one')
  })

  it('Checks if the Appointment Booking header is present', () => {
    cy.contains('Appointment Booking').should('be.visible')
  })

  it('Checks if the first name field is present', () => {
    cy.get('input[name="first_name"]').should('be.visible')
  })

  it('Checks if the last name field is present', () => {
    cy.get('input[name="last_name"]').should('be.visible')
  })

  it('Checks if the email field is present', () => {
    cy.get('input[name="email"]').should('be.visible')
  })

  it('Checks if the phone number field is present', () => {
    cy.get('input[name="tel_number"]').should('be.visible')
  })

  it('Checks if the date field is present', () => {
    cy.get('input[name="date"]').should('be.visible')
  })

  it('Fills out the first name field', () => {
    cy.get('input[name="first_name"]').type('John')
  })

  it('Fills out the last name field', () => {
    cy.get('input[name="last_name"]').type('Doe')
  })

  it('Fills out the email field', () => {
    cy.get('input[name="email"]').type('john.doe@example.com')
  })

  it('Fills out the phone number field', () => {
    cy.get('input[name="tel_number"]').type('1234567890')
  })

  it('Fills out the date field', () => {
    cy.get('input[name="date"]').type('2024-06-04T10:00')  
  })

  it('Clicks the Next button', () => {
    cy.contains('Next').click()
  })

  it('Checks for validation errors after submitting the form', () => {
    cy.get('input[name="first_name"]').type('John')
    cy.get('input[name="last_name"]').type('Doe')
    cy.get('input[name="email"]').type('john.doe@example.com')
    cy.get('input[name="tel_number"]').type('1234567890')
    cy.get('input[name="date"]').type('2024-06-04T10:00')  

    cy.contains('Next').click()
    
   
    cy.wait(2000)
    
    
    cy.get('.error-message').should('not.exist')
  })


})
