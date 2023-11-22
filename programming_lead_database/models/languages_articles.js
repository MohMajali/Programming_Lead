const { Sequelize, DataTypes } = require("sequelize");
const sequelize = require("../util/database");

const LanguagesArticles = sequelize.define(
  "languages_articles",
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
    title: {
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
    link: {
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

module.exports = LanguagesArticles;
