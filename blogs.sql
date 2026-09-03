CREATE DATABASE blog_website;  
USE blog_website;  
CREATE TABLE blogs (      
id INT AUTO_INCREMENT PRIMARY KEY,      
title VARCHAR(255),      
short_description TEXT,      
full_content TEXT,      
image VARCHAR(255),      
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
); 
