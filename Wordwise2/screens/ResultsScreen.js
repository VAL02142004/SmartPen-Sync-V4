import React from "react";
import { View, Text, Button, StyleSheet } from "react-native";

export default function ResultsScreen({ route, navigation }) {
  const { score } = route.params;

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Game Over!</Text>
      <Text style={styles.score}>Your Score: {score}</Text>
      <Button title="Play Again" onPress={() => navigation.navigate("Game")} />
      <Button title="Home" onPress={() => navigation.navigate("Home")} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, justifyContent: "center", alignItems: "center" },
  title: { fontSize: 24, fontWeight: "bold", marginBottom: 10 },
  score: { fontSize: 20, color: "green", marginBottom: 20 },
});
