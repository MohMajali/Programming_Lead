const mysql = require("mysql2");

const Sequelize = require("sequelize");
const sequelize = new Sequelize("programming_lead", "root", "", {
  dialect: "mysql",
  host: "localhost",
});

module.exports = sequelize;
