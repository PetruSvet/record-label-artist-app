### Week 1
During the first week, I worked on trying to decide which subject I wanted to try make my project on, first I decided a restaurant type but that was turned down by Anne because it wasn't practical she adviced me to do it on a record label > artists > album type genre so I went with that and I liked the idea, I made my ERD diagram and first week was basically setting up my Laravel project making sure to install everything like blade and node and setting up the localhost

### Week 2
In the second week I starterd to develop the CRUD, I went on with the lecture notes just basically following those, by the end of the second week I have developed the show method for my artists, you could view all the artists that I have added in my artistcontroller.php from phpmyadmin

### Week 3
The third week was spend on creating the reusable blade components for a cleaner and more maintainable frontend, I made the artist details and the artist form which you could use to create any artist you want, tailwind was used to style and make the layout nice, this week I went up to the lesson 9 in the notes

### Week 4
During the fourth week I finished up the project by adding the store, edit and delete features of the CRUD, I also added an extra feature that embedded youtube videos for each artist so you could listen to one of their songs and also linking their social media handle to their wikipedia page

### Week 5
In week five, I focused on the songs functionality. I created the Song model, migration, and controller, making sure to enforce the one-to-many relationship with artists. I added seeders to populate the database with 3–4 songs for each artist so that every artist had their own unique songs. I also created forms and Blade components to add, edit, and view songs from the frontend, ensuring that validation rules like title, duration, and release date were applied correctly. This week was dedicated to making the songs feature fully integrated with artists

### Week 6
Week six was all about record labels and many-to-many relationships. I created the RecordLabel model and migration, as well as a pivot table to link artists to multiple labels. I updated the artist creation and edit forms to allow selecting multiple record labels using checkboxes and multi-select inputs. I also wrote seeders to automatically assign record labels to each artist, by the end of the week, I could view an artist and see all the record labels they belonged to, and vice versa

### Week 7
In the seventh week, I focused on polishing the frontend and user experience, I created reusable Blade components for record labels, songs, and alerts, so that success messages, error messages, and content cards were consistent across the project I also made sure all pages were responsive using TailwindCSS and tested the layout on mobile, tablet, and desktop screens, this week was about making the interface look clean, professional, and user-friendly

### Week 8
During week eight, I spent time connecting all the features together and testing the full workflow. I checked that artists, songs, and record labels could be created, updated, and deleted without breaking relationships. I also fixed minor bugs, such as displaying multiple record labels correctly on the artist details page and showing the embedded YouTube video only when present. I refined validation messages and error handling to make the app more robust and user-friendly, I finalized the project and prepared it for presentation, I wrote detailed comments in all controllers and seeders, explaining what each piece of code does, I also tested database seeding for artists, songs, and record labels to ensure realistic and unique data. Finally, I prepared a screencast demonstrating all features, including CRUD for artists, songs, and record labels, embedded videos, social media links, and the responsive frontend design. The project was fully functional and ready to be showcased.

## Features
Full CRUD functionality for artists, songs, and record labels
One-to-many relationship: Artists → Songs
Many-to-many relationship: Artists ↔ Record Labels
Profile picture uploads and storage
Embedded YouTube videos for each artist 
Reusable Blade components for forms, cards, alerts, and details 
Multi-select and checkbox support for assigning record labels to artists
Responsive design with TailwindCSS
Validation and error handling for all form
Database seeders for realistic sample data for artists, songs, and record labels
