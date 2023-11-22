const { Sequelize, DataTypes } = require("sequelize");
const sequelize = require("../util/database");

const Languages = sequelize.define(
  "languages",
  {
    id: {
      type: DataTypes.INTEGER,
      autoIncrement: true,
      allowNull: false,
      primaryKey: true,
    },
    name: {
      type: DataTypes.STRING,
      required: true,
    },
    description: {
      type: DataTypes.TEXT,
      required: true,
      allowNull: false,
    },
    image: {
      type: DataTypes.STRING,
      required: true,
      allowNull: false,
    },
    started_date: {
      type: DataTypes.STRING,
      required: true,
      allowNull: false,
    },
    total_rate: {
      type: DataTypes.DOUBLE,
      required: true,
      defaultValue: 0,
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

module.exports = Languages;
