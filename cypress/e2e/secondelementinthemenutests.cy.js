describe('Service Listings Page Tests', () => {
  beforeEach(() => {
      
      cy.visit('http://127.0.0.1:8000/services');
  });

  it('ensures that all service images are visible', () => {
      cy.get('img[alt="service Image"]').should('be.visible');
  });

  it('ensures that service titles and descriptions are visible', () => {
      const services = [
          { title: 'Haircut', description: 'A professional haircut service for a fresh and stylish look.' },
          { title: 'Manicure', description: 'Indulge in our nail service for well-groomed and beautiful nails.' },
         
      ];

      services.forEach(service => {
          cy.contains('h4', service.title).should('be.visible');
          cy.contains('p', service.description).should('be.visible');
      });
  });

  it('checks the visibility and correctness of service prices and booking links', () => {
      cy.get('.container').within(() => {
          cy.get('div.grid').each((element, index) => {
             
              cy.wrap(element).find('span.text-green-600').should('be.visible').invoke('text').should('match', /\$\d+/);
              cy.wrap(element).find('a').should('have.attr', 'href').and('include', 'appointments/step-two?service_id=');
          });
      });
  });
});
