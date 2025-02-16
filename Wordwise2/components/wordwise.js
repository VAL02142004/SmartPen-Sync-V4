import React from "react";
import { View, Text, TouchableOpacity, StyleSheet } from "react-native";
import { Audio } from "expo-av";

export default function WordCard({ word }) {
  const playSound = async () => {
    const sound = new Audio.Sound();
    try {
      await sound.loadAsync({ uri: `https://api.dictionaryapi.dev/media/pronunciations/en/${word}-us.mp3` });
      await sound.playAsync();
    } catch (error) {
      console.log("Error playing sound:", error);
    }
  };

  return (
    <View style={styles.card}>
      <Text style={styles.word}>{word}</Text>
      <TouchableOpacity style={styles.button} onPress={playSound}>
        <Text style={styles.buttonText}>🔊 Hear Pronunciation</Text>
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  card: { backgroundColor: "#f5f5f5", padding: 20, margin: 10, borderRadius: 10, alignItems: "center" },
  word: { fontSize: 24, fontWeight: "bold" },
  button: { backgroundColor: "blue", padding: 10, marginTop: 10, borderRadius: 5 },
  buttonText: { color: "white", fontSize: 16 },
});
