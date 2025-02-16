import React from "react";
import { View, Text, TouchableOpacity, Button, StyleSheet } from "react-native";

export default function HomeScreen({ navigation }) {
    const revealLetter = () => {
        // Add your reveal letter logic here
        console.log("Reveal Letter button pressed");
    };

    return (
        <View style={styles.container}>
            <Text style={styles.title}>Welcome to WordWise</Text>
            <TouchableOpacity style={styles.button} onPress={() => navigation.navigate("Game")}>
                <Text style={styles.buttonText}>Start Challenge</Text>
            </TouchableOpacity>
            <Button title="Start Game" onPress={() => navigation.navigate("Game")} />
            <Button title="Profile" onPress={() => navigation.navigate("Profile")} /> {/* 👈 Profile Button */}
            <Button title="Reveal Letter (x3)" onPress={revealLetter} /> {/* 👈 Reveal Letter Button */}
        </View>
    );
}

const styles = StyleSheet.create({
    container: { flex: 1, justifyContent: "center", alignItems: "center" },
    title: { fontSize: 24, fontWeight: "bold", marginBottom: 20 },
    button: { backgroundColor: "blue", padding: 15, borderRadius: 10, marginBottom: 10 },
    buttonText: { color: "white", fontSize: 18 },
});
