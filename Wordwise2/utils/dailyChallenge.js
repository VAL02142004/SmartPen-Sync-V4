import AsyncStorage from "@react-native-async-storage/async-storage";
import { words } from "./words";

export const getDailyWord = async () => {
  const today = new Date().toDateString();
  const storedChallenge = await AsyncStorage.getItem("dailyChallenge");

  if (storedChallenge) {
    const { date, word } = JSON.parse(storedChallenge);
    if (date === today) {
      return word; // Return the same word for the day
    }
  }

  const newWord = words[Math.floor(Math.random() * words.length)];
  await AsyncStorage.setItem("dailyChallenge", JSON.stringify({ date: today, word: newWord }));
  return newWord;
};
