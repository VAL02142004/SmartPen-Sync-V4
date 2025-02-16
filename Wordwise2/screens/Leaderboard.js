import React, { useEffect, useState } from "react";
import { View, Text, FlatList, StyleSheet } from "react-native";
import AsyncStorage from "@react-native-async-storage/async-storage";

export default function Leaderboard() {
  const [scores, setScores] = useState([]);

  useEffect(() => {
    loadScores();
  }, []);

  const loadScores = async () => {
    try {
      const storedScores = JSON.parse(await AsyncStorage.getItem("leaderboard")) || [];
      setScores(storedScores);
    } catch (error) {
      console.log("Error loading scores:", error);
    }
  };

  return (
    <View style={styles.container}>
      <Text style={styles.title}>🏆 Leaderboard</Text>
      <FlatList
        data={scores}
        keyExtractor={(item, index) => index.toString()}
        renderItem={({ item, index }) => (
          <View style={styles.item}>
            <Text style={styles.rank}>#{index + 1}</Text>
            <Text style={styles.score}>Score: {item.score}</Text>
            <Text style={styles.date}>{new Date(item.date).toLocaleString()}</Text>
          </View>
        )}
      />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, alignItems: "center", padding: 20, backgroundColor: "#fff" },
  title: { fontSize: 24, fontWeight: "bold", marginBottom: 10 },
  item: { flexDirection: "row", justifyContent: "space-between", width: "100%", padding: 10, borderBottomWidth: 1 },
  rank: { fontSize: 18, fontWeight: "bold" },
  score: { fontSize: 18 },
  date: { fontSize: 14, color: "gray" },
});
