import AsyncStorage from "@react-native-async-storage/async-storage";

export const saveScore = async (score) => {
  try {
    await AsyncStorage.setItem("highScore", JSON.stringify(score));
  } catch (error) {
    console.error("Error saving score", error);
  }
};

export const getScore = async () => {
  try {
    const score = await AsyncStorage.getItem("highScore");
    return score ? JSON.parse(score) : 0;
  } catch (error) {
    console.error("Error retrieving score", error);
  }
};

export const saveProfile = async (profile) => {
  try {
    await AsyncStorage.setItem("userProfile", JSON.stringify(profile));
  } catch (error) {
    console.error("Error saving profile", error);
  }
};

export const getProfile = async () => {
  try {
    const profile = await AsyncStorage.getItem("userProfile");
    return profile ? JSON.parse(profile) : { name: "Player", avatar: "default.png", badges: [] };
  } catch (error) {
    console.error("Error retrieving profile", error);
  }
};
