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
