const { Sequelize, DataTypes } = require("sequelize");
const sequelize = require("../util/database");

const Courses = sequelize.define(
  "languages_courses",
  {
    id: {
      type: DataTypes.INTEGER,
      autoIncrement: true,
      allowNull: false,
      primaryKey: true,
    },
    language_id: {
      type: DataTypes.INTEGER,
      references: {
        model: "languages",
        key: "id",
      },
    },
    name: {
      type: DataTypes.STRING,
      required: true,
      allowNull: false,
    },
    description: {
      type: DataTypes.TEXT,
      required: true,
      allowNull: false,
    },
    image: {
      type: DataTypes.STRING,
      required: true,
      allowNull: true,
    },
    author: {
      type: DataTypes.STRING,
      required: true,
      allowNull: true,
    },
    link: {
      type: DataTypes.STRING,
      required: true,
      allowNull: false,
    },
    rate: {
      type: DataTypes.STRING,
      required: true,
      allowNull: false,
    },
    active: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 1,
    },
    created_at: {
      type: DataTypes.DATE,
      allowNull: false,
      defaultValue: Sequelize.literal("CURRENT_TIMESTAMP"),
    },
  },
  {
    timestamps: false,
  }
);

module.exports = Courses;
