User Story 1 (Admin): Account 
As a new Admin, I want to complete my account setup by creating a username and password to securely access the Lost and Found Hub admin portal.  

Acceptance Criteria: 
     
1. Username & Password Creation:
   - Admin can choose a unique username (e.g., email) and a new password.  
   - Password must meet criteria rules  
   - Username must be unique; system validates against existing accounts.
 


User Story 2 (Admin): Secure Login
As an Admin: I want to log into the Lost and Found Hub admin portal with my username and password So that I can manage lost-and-found items and user inquiries securely.  

Acceptance Criteria:
1. Login Form:  
   - Fields: Username (email) and Password.
   - Admin logged access as admin
   - Session expires after 15 minutes of inactivity.


User Story 3 (User): Self-Registration
As a User: I want to register for an account using my email and create a password So that I can report lost items or claim found items.  

Acceptance Criteria: 
1. Registration Form: 
   - Fields: Full Name, Email (required), Password.  
   - Terms of Service and Privacy Policy links included.

2. Validation:  
   - Password requires 8+ characters.  
3. Confirmation:   
   - The user cannot log in until the email is in the database.  

User Story 4 (User): Secure Login 
As a User: I want to log into the Lost and Found Hub with my email and password so that I can securely access my account and view item statuses.  

Acceptance Criteria: 
1. Login Form: 
   - Fields: Email and Password.    
2. Security:  
   - Passwords are hashed and never stored in plain text.  
    
3. Error Handling:
   - Clear error messages for invalid credentials or unverified accounts.  


