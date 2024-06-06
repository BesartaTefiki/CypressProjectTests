describe('Appointment Booking Form Tests', () => {
  beforeEach(() => {
    
    cy.visit('/appointments/step-one')
  })

  it('Checks if the Appointment Booking header is visible', () => {
    cy.contains('Appointment Booking').should('be.visible')
  })

  it('Checks if the first name input field is visible', () => {
    cy.get('input[name="first_name"]').should('be.visible')
  })

  it('Checks if the last name input field is visible', () => {
    cy.get('input[name="last_name"]').should('be.visible')
  })

  it('Checks if the email input field is visible', () => {
    cy.get('input[name="email"]').should('be.visible')
  })

  it('Checks if the phone number input field is visible', () => {
    cy.get('input[name="tel_number"]').should('be.visible')
  })

  it('Checks if the date input field is visible', () => {
    cy.get('input[name="date"]').should('be.visible')
  })

  it('Checks if the Next button is visible', () => {
    cy.contains('Next').should('be.visible')
  })

  it('Fills out the first name input field', () => {
    cy.get('input[name="first_name"]').type('John')
  })

  it('Fills out the last name input field', () => {
    cy.get('input[name="last_name"]').type('Doe')
  })

  it('Fills out the email input field', () => {
    cy.get('input[name="email"]').type('john.doe@example.com')
  })

  it('Fills out the phone number input field', () => {
    cy.get('input[name="tel_number"]').type('1234567890')
  })

  it('Fills out the date input field', () => {
    cy.get('input[name="date"]').type('2024-05-29T10:00')
  })

})
