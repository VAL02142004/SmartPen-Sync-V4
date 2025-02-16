import AsyncStorage from "@react-native-async-storage/async-storage";

export const saveProfile = async (profile) => {
  await AsyncStorage.setItem("userProfile", JSON.stringify(profile));
};

export const getProfile = async () => {
  const profile = await AsyncStorage.getItem("userProfile");
  return profile ? JSON.parse(profile) : { name: "Player", avatar: "https://example.com/default-avatar.png", badges: [] };
};
