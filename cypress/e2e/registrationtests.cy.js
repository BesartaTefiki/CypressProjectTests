describe('Registration Form Tests', () => {
    beforeEach(() => {
       
        cy.visit('/register'); 
    });

    it('checks the visibility and functionality of the Name input', () => {
        cy.get('input[name="name"]').should('be.visible').type('John Doe');
        cy.get('input[name="name"]').should('have.value', 'John Doe');
    });

    it('checks the visibility and functionality of the Email input', () => {
        cy.get('input[name="email"]').should('be.visible').type('johndoe@example.com');
        cy.get('input[name="email"]').should('have.value', 'johndoe@example.com');
    });

    it('checks the visibility and functionality of the Password input', () => {
        cy.get('input[name="password"]').should('be.visible').type('password123');
        cy.get('input[name="password"]').should('have.value', 'password123');
    });

    it('checks the visibility and functionality of the Confirm Password input', () => {
        cy.get('input[name="password_confirmation"]').should('be.visible').type('password123');
        cy.get('input[name="password_confirmation"]').should('have.value', 'password123');
    });

    it('submits the form and checks for the expected redirection or behavior after registration', () => {
        
        cy.get('input[name="name"]').type('John Doe');
        cy.get('input[name="email"]').type('johndoe@example.com');
        cy.get('input[name="password"]').type('password123');
        cy.get('input[name="password_confirmation"]').type('password123');

        
        cy.intercept('POST', '**/register').as('registerForm');
        cy.get('button[type="submit"]').contains('Register').click();

      
        cy.wait('@registerForm').then((interception) => {
            assert.equal(interception.response.statusCode, 302, 'Expect a redirection on successful registration');
           
        });

        
        cy.url().should('include', '/'); 
    });
});
