/*  Learning Managment System
 *  ---------
 *  Users
 *  Content
 *  Courses
 *  Completions
*/


/*  USER
  ---------
  user_id
  user_name
  password
*/
  CREATE TABLE user_login (
   id         SERIAL                 NOT NULL,
   user_name  TEXT            NOT NULL,
   password   TEXT            NOT NULL,
   PRIMARY KEY( id )
);

INSERT INTO "user" VALUES (001, 'pflick', 'LetMeIn');
INSERT INTO "user" VALUES (002, 'jimmyj', 'LetMeIn');
INSERT INTO "user" VALUES (003, 'pointdext', 'LetMeIn');


/*  Content
--------------
  id
  name
  data / text
  coures_id
  order
*/
  CREATE TABLE "content" (
   id              SERIAL              NOT NULL,
   name            VARCHAR(40)         NOT NULL,
   data            TEXT                NOT NULL,
   course_id       INT                 NOT NULL,
   course_order    INT                 NOT NULL,
   PRIMARY KEY( id ),
   FOREIGN KEY (course_id) REFERENCES course(id)
);
INSERT INTO "content" VALUES (1, 'Select Plants', 'When selecting plants make sure to looks for...', 1, 1);
INSERT INTO "content" VALUES (2, 'Finding Dirt', 'You will need to find a good chunk of dirt that...', 1, 2);
INSERT INTO "content" VALUES (3, 'Planting', 'Place the seed into the dirt for it to start growing...', 1, 3);


/*  Course
--------------
  id
  name
*/

CREATE TABLE "course" (
 id    SERIAL              NOT NULL,
 name  VARCHAR(40)         NOT NULL,
 PRIMARY KEY( id )
);
INSERT INTO course(name) VALUES ('Growing Plants');
INSERT INTO course(name) VALUES ('Keeping Bees');
INSERT INTO course(name) VALUES ('Arduinos for Beginners');


/* Complete
---------------
  id
  user_id
  content_id
*/
CREATE TABLE "complete" (
   id               SERIAL    NOT NULL,
   user_id          INT       NOT NULL,
   content_id       INT       NOT NULL,
   PRIMARY KEY( user_id )
);
INSERT INTO "complete" VALUES (1, 2, 2);
