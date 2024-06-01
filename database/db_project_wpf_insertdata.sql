INSERT INTO students VALUES("S2400001", "AlbertV24", "Albert@456", "Albert Valentino Utomo", "albert.v22@mhs.istts.ac.id", "Jalan Yang Penuh Kenangan No. 6-10 Blok A", "81322310662", NOW(), NULL, NULL);
INSERT INTO students VALUES("S2400002", "KevinJo24", "Kevin@234", "Kevin Jonathan", "kevin.j22@mhs.istts.ac.id", "Jalan Kenangan No. 45-47", "81322310664", NOW(), NULL, NULL);
INSERT INTO students VALUES("S2400003", "Raymond24", "Raymond@345", "Raymond Lyanto Hoentoro", "raymond.l22@mhs.istts.ac.id", "Jalan Tidak Buntu No. 73-79", "81322310667", NOW(), NULL, NULL);
INSERT INTO students VALUES("S2400004", "RoyEvan24", "Roy@123", "Roy Evan Wiguna", "roy.e22@mhs.istts.ac.id", "Jalan Ku Berpisah Dengan Mu No. 73-77", "81322310670", NOW(), NULL, NULL);

INSERT INTO teachers VALUES("T2024001", "Albert", "Albert@456", "Albert Valentino", "albert.v22@teach.istts.ac.id", "Jalan Yang Penuh Kenangan No. 6-10 Blok A", "81322310662", NOW(), NULL, NULL);
INSERT INTO teachers VALUES("T2024002", "Kevin", "Kevin@234", "Kevin Jonathan", "kevin.j22@teach.istts.ac.id", "Jalan Kenangan No. 45-47", "81322310664", NOW(), NULL, NULL);
INSERT INTO teachers VALUES("T2024003", "Raymond", "Raymond@345", "Raymond Lyanto", "raymond.l22@teach.istts.ac.id", "Jalan Tidak Buntu No. 73-79", "81322310667", NOW(), NULL, NULL);
INSERT INTO teachers VALUES("T2024004", "Roy", "Roy@123", "Roy Evan", "roy.e22@teach.istts.ac.id", "Jalan Ku Berpisah Dengan Mu No. 73-77", "81322310670", NOW(), NULL, NULL);

INSERT INTO courses VALUES("C0001", "T2024001", "English", "You will learn basic English for daily life!", 1, "A-201", "Monday", 1.5, NOW(), NULL, NULL);
INSERT INTO courses VALUES("C0002", "T2024001", "English", "You will learn complex English for complex conversations!", 2, "A-202", "Thursday", 2.5, NOW(), NULL, NULL);
INSERT INTO courses VALUES("C0003", "T2024002", "Mandarin", "You will learn basic Mandarin for daily life!", 1, "A-203", "Monday", 1.5, NOW(), NULL, NULL);
INSERT INTO courses VALUES("C0004", "T2024002", "Mandarin", "You will learn complex Mandarin for complex conversations!", 2, "A-204", "Tuesday", 2.5, NOW(), NULL, NULL);
INSERT INTO courses VALUES("C0005", "T2024003", "Spanish", "You will learn basic Spanish for daily life!", 1, "A-205", "Saturday", 1.5, NOW(), NULL, NULL);
INSERT INTO courses VALUES("C0006", "T2024003", "Spanish", "You will learn complex Spanish for complex conversations!", 2, "A-206", "Thursday", 2.5, NOW(), NULL, NULL);
INSERT INTO courses VALUES("C0007", "T2024004", "Japanese", "You will learn basic Japanese for daily life!", 1, "A-207", "Saturday", 1.5, NOW(), NULL, NULL);
INSERT INTO courses VALUES("C0008", "T2024004", "Japanese", "You will learn complex Japanese for complex conversations!", 2, "A-208", "Friday", 2.5, NOW(), NULL, NULL);

INSERT INTO courses_taken VALUES("S2400001", "C0005", 1);
INSERT INTO courses_taken VALUES("S2400002", "C0001", 1);
INSERT INTO courses_taken VALUES("S2400001", "C0001", 0);
INSERT INTO courses_taken VALUES("S2400001", "C0006", 0);
INSERT INTO courses_taken VALUES("S2400001", "C0007", 0);
INSERT INTO courses_taken VALUES("S2400002", "C0003", 1);
INSERT INTO courses_taken VALUES("S2400002", "C0002", 0);
INSERT INTO courses_taken VALUES("S2400002", "C0004", 0);
INSERT INTO courses_taken VALUES("S2400003", "C0001", 0);
INSERT INTO courses_taken VALUES("S2400003", "C0005", 1);
INSERT INTO courses_taken VALUES("S2400003", "C0003", 0);
INSERT INTO courses_taken VALUES("S2400003", "C0007", 1);
INSERT INTO courses_taken VALUES("S2400004", "C0001", 1);
INSERT INTO courses_taken VALUES("S2400003", "C0006", 0);
INSERT INTO courses_taken VALUES("S2400003", "C0008", 0);
INSERT INTO courses_taken VALUES("S2400004", "C0002", 0);
INSERT INTO courses_taken VALUES("S2400004", "C0003", 0);
INSERT INTO courses_taken VALUES("S2400004", "C0005", 0);

INSERT INTO materials VALUES(NULL, "C0001", "Week 0", "Introduction to English!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0003", "Week 0", "Introduction to Mandarin!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0004", "Week 0", "Introduction to Complex Mandarin!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0002", "Week 0", "Introduction to Complex English!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0006", "Week 0", "Introduction to Complex Spanish!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0008", "Week 0", "Introduction to Complex Japanese!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0005", "Week 0", "Introduction to Spanish", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0007", "Week 0", "Introduction to Japanese!", NOW(), NULL, NULL);

INSERT INTO materials VALUES(NULL, "C0001", "Week 1", "Basic English Sentences and Questions", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0003", "Week 1", "Basic Mandarin Sentences and Questions", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0004", "Week 1", "Talk about our holidays in Mandarin!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0002", "Week 1", "Talk about our holidays in English!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0006", "Week 1", "Talk about our holidays in Spanish!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0008", "Week 1", "Talk about our holidays in Japanese!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0005", "Week 1", "Basic Spanish Sentences and Questions", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0007", "Week 1", "Basic Japanese Sentences and Questions", NOW(), NULL, NULL);

INSERT INTO materials VALUES(NULL, "C0001", "Week 2", "Basic Tenses in English!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0003", "Week 2", "Speaking Basic Sentences in Mandarin!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0004", "Week 2", "Making Poetry in Mandarin!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0002", "Week 2", "Making Poetry in English!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0006", "Week 2", "Making Poetry in Spanish!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0008", "Week 2", "Making Poetry in Japanese!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0005", "Week 2", "Speaking Basic Sentences in Spanish!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0007", "Week 2", "Speaking Basic Sentences in Japanese!", NOW(), NULL, NULL);

INSERT INTO materials VALUES(NULL, "C0001", "Week 3", "Talk about our family and friends in English!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0003", "Week 3", "Writing basic sentences and a story about family in Mandarin!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0004", "Week 3", "Guess these chinese songs lyrics!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0002", "Week 3", "Guess what is the meaniong of these English songs!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0006", "Week 3", "Guess what is the meaniong of these Spanish songs!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0008", "Week 3", "Guess what is the meaniong of these Japanese songs!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0005", "Week 3", "Talk about our family and friends in Spanish!", NOW(), NULL, NULL);
INSERT INTO materials VALUES(NULL, "C0007", "Week 3", "Talk about our family and friends in Japanese!", NOW(), NULL, NULL);

INSERT INTO assignments VALUES(NULL, "C0001", "Week 0", "Week 0 - Basic English", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0003", "Week 0", "Week 0 - Basic Mandarin", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0004", "Week 0", "Week 0 - Complex Mandarin", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0002", "Week 0", "Week 0 - Complex English", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0006", "Week 0", "Week 0 - Complex Spanish", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0008", "Week 0", "Week 0 - Complex Japanese", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0005", "Week 0", "Week 0 - Basic Spanish", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0007", "Week 0", "Week 0 - Basic Japanese", NOW(), NOW(), NULL, NULL);

INSERT INTO assignments VALUES(NULL, "C0001", "Week 1", "Week 1 - Basic English", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0003", "Week 1", "Week 1 - Basic Mandarin", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0004", "Week 1", "Week 1 - Complex Mandarin", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0002", "Week 1", "Week 1 - Complex English", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0006", "Week 1", "Week 1 - Complex Spanish", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0008", "Week 1", "Week 1 - Complex Japanese", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0005", "Week 1", "Week 1 - Basic Spanish", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0007", "Week 1", "Week 1 - Basic Japanese", NOW(), NOW(), NULL, NULL);

INSERT INTO assignments VALUES(NULL, "C0001", "Week 2", "Week 2 - Basic English", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0003", "Week 2", "Week 2 - Basic Mandarin", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0004", "Week 2", "Week 2 - Complex Mandarin", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0002", "Week 2", "Week 2 - Complex English", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0006", "Week 2", "Week 2 - Complex Spanish", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0008", "Week 2", "Week 2 - Complex Japanese", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0005", "Week 2", "Week 2 - Basic Spanish", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0007", "Week 2", "Week 2 - Basic Japanese", NOW(), NOW(), NULL, NULL);

INSERT INTO assignments VALUES(NULL, "C0001", "Week 3", "Week 3 - Basic English", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0003", "Week 3", "Week 3 - Basic Mandarin", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0004", "Week 3", "Week 3 - Complex Mandarin", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0002", "Week 3", "Week 3 - Complex English", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0006", "Week 3", "Week 3 - Complex Spanish", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0008", "Week 3", "Week 3 - Complex Japanese", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0005", "Week 3", "Week 3 - Basic Spanish", NOW(), NOW(), NULL, NULL);
INSERT INTO assignments VALUES(NULL, "C0007", "Week 3", "Week 3 - Basic Japanese", NOW(), NOW(), NULL, NULL);

