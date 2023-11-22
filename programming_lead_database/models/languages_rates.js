const { Sequelize, DataTypes } = require("sequelize");
const sequelize = require("../util/database");

const LanguagesRates = sequelize.define(
  "languages_rates",
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
    user_id: {
      type: DataTypes.INTEGER,
      references: {
        model: "users",
        key: "id",
      },
    },
    rate: {
      type: DataTypes.DOUBLE,
      allowNull: false,
      required: true,
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

module.exports = LanguagesRates;
