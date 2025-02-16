import React, { useEffect, useState } from "react";
import { View, Text, StyleSheet } from "react-native";
import { getScore } from "../utils/storage";

export default function ProgressTracker() {
  const [highScore, setHighScore] = useState(0);

  useEffect(() => {
    const fetchScore = async () => {
      const savedScore = await getScore();
      setHighScore(savedScore);
    };
    fetchScore();
  }, []);

  return (
    <View style={styles.container}>
      <Text style={styles.text}>🏆 High Score: {highScore}</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: { padding: 10, backgroundColor: "#eee", borderRadius: 10, margin: 10, alignItems: "center" },
  text: { fontSize: 18, fontWeight: "bold" },
});

