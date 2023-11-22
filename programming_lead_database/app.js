const express = require("express");
const sequelize = require("./util/database");
const bodyParser = require("body-parser");
const path = require("path");

// const UserTypes = require('./models/user_type');
// const User = require('./models/user');
// const Languages = require('./models/languages');
// const Courses = require('./models/courses');
// const LanguagesYoutubeCourses = require("./models/languages_youtube_courses");
// const LanguagesArticles = require("./models/languages_articles");
// const Posts = require('./models/posts');
// const Comments = require('./models/comments');
// const LanguagesRates = require('./models/languages_rates');

const app = express();
app.use(bodyParser.json());

sequelize
  // .sync({ force: true })
  .sync()
  .then((result) => {
    const server = app.listen(8080);
  })
  .catch((err) => {
    console.log("ERROR", err);
  });
