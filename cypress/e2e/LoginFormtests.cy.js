describe('Login Page Tests', () => {
  beforeEach(() => {
   
    cy.visit('/login');
  });

  it('checks the visibility and functionality of the Email Address input', () => {
    cy.get('input[name="email"]')
      .should('be.visible')
      .type('user@example.com')
      .should('have.value', 'user@example.com');
  });

  it('checks the visibility and functionality of the Password input', () => {
    cy.get('input[name="password"]')
      .should('be.visible')
      .type('password123')
      .should('have.value', 'password123');
  });

  it('checks the functionality of the Remember Me checkbox', () => {
    cy.get('input[name="remember"]')
      .should('not.be.checked')
      .check()
      .should('be.checked');
  });

  it('verifies that the Forgot your password? link is correct and clickable', () => {
    cy.contains('a', 'Forgot your password?')
      .should('have.attr', 'href', 'http://localhost:8000/forgot-password')
      .click();
    cy.url().should('include', '/forgot-password');
  });

  it('ensures that the Log in button triggers the form submission', () => {
   
    cy.intercept('POST', '/login').as('loginRequest');
    cy.get('input[name="email"]').type('user@example.com');
    cy.get('input[name="password"]').type('password123');
    cy.get('button[type="submit"]').click();

   
    cy.wait('@loginRequest').then((interception) => {
      expect(interception.response.statusCode).to.eq(302); 
    });


    cy.url().should('include', '/dashboard'); 
  });
});
