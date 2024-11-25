```sql
CREATE TABLE remove_patterns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pattern VARCHAR(255) NOT NULL
);

```

```sql
INSERT INTO remove_patterns (pattern) VALUES 
('[iai:allegro_description_section_text-begin]'), 
('[iai:allegro_description_section_text-end]'), 
('[iai:allegro_description_section_photo_and_text-begin]'), 
('[iai:allegro_description_section_photo_and_text-end]'), 
('[iai:allegro_description_section_text_and_photo-begin]'), 
('[iai:allegro_description_section_text_and_photo-end]');

```
