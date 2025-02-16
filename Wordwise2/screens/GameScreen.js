import React, { useState, useEffect } from "react";
import { View, Text, TextInput, StyleSheet, Alert, Animated } from "react-native";
import { Button } from "react-native-paper";
import { getWordByLevel } from "../utils/words";
import { getDailyWord } from "../utils/dailyChallenge";
import AsyncStorage from "@react-native-async-storage/async-storage";
import { Audio } from "expo-av";

const words = {
    animals: ["cat", "dog", "elephant"],
    science: ["atom", "molecule", "gravity"]
};

export default function GameScreen({ navigation }) {
    const playerLevel = 55; // Example: Hard level
    const [theme, setTheme] = useState("animals");
    const [word, setWord] = useState(selectWord());
    const [dailyWord, setDailyWord] = useState("");
    const [input, setInput] = useState("");
    const [score, setScore] = useState(0);
    const [streak, setStreak] = useState(0);
    const [timeLeft, setTimeLeft] = useState(30);
    const [xp, setXP] = useState(0);
    const [hints, setHints] = useState(3);
    const fadeAnim = new Animated.Value(0);

    useEffect(() => {
        getDailyWord().then(setDailyWord);
    }, []);

    // Load sounds
    const playSound = async (type) => {
        const sound = new Audio.Sound();
        try {
            if (type === "correct") {
                await sound.loadAsync(require("../assets/sounds/correct.mp3"));
            } else if (type === "wrong") {
                await sound.loadAsync(require("../assets/sounds/wrong.mp3"));
            } else if (type === "timer") {
                await sound.loadAsync(require("../assets/sounds/tick.mp3"));
            }
            await sound.playAsync();
        } catch (error) {
            console.log("Error playing sound", error);
        }
    };

    // Timer countdown
    useEffect(() => {
        if (timeLeft > 0) {
            if (timeLeft <= 5) playSound("timer"); // Beep for last 5 seconds
            const timer = setTimeout(() => setTimeLeft(timeLeft - 1), 1000);
            return () => clearTimeout(timer);
        } else {
            endGame();
        }
    }, [timeLeft]);

    // Show feedback animation
    const showFeedback = () => {
        Animated.sequence([
            Animated.timing(fadeAnim, { toValue: 1, duration: 300, useNativeDriver: true }),
            Animated.timing(fadeAnim, { toValue: 0, duration: 500, delay: 1000, useNativeDriver: true }),
        ]).start();
    };

    const selectWord = () => {
        const wordList = words[theme];
        return wordList[Math.floor(Math.random() * wordList.length)];
    };

    const checkAnswer = () => {
        if (input.toLowerCase() === word.toLowerCase()) {
            playSound("correct");
            const newScore = score + 1 + streak;
            setScore(newScore);
            setStreak(streak + 1);
            setWord(selectWord());
            setInput("");
            setXP(xp + 20);
            if (xp >= 100) {
                setTheme("science"); // Unlocks next theme!
                Alert.alert("🎉 New Theme Unlocked!", "Science words available!");
            }
            showFeedback();
        } else {
            playSound("wrong");
            setStreak(0);
            Alert.alert("❌ Wrong!", "Try again.");
        }
    };

    const checkDailyChallenge = () => {
        if (input.toLowerCase() === dailyWord.toLowerCase()) {
            playSound("correct");
            Alert.alert("🎉 Challenge Completed!", "You earned 50 XP!");
            setXP(xp + 50); // Reward XP
        } else {
            playSound("wrong");
            Alert.alert("❌ Try Again!", "Keep going!");
        }
    };

    const saveScore = async () => {
        try {
            let scores = JSON.parse(await AsyncStorage.getItem("leaderboard")) || [];
            scores.push({ score, date: new Date().toISOString() });
            scores.sort((a, b) => b.score - a.score); // Sort by highest score
            await AsyncStorage.setItem("leaderboard", JSON.stringify(scores));
        } catch (error) {
            console.log("Error saving score:", error);
        }
    };

    const endGame = () => {
        saveScore();
        Alert.alert("⏳ Time's Up!", `Final Score: ${score}`, [
            { text: "OK", onPress: () => navigation.navigate("Leaderboard") },
        ]);
    };

    const createGame = (player) => {
        Alert.alert("Challenge Sent!", `You have challenged ${player} to a game!`);
    };

    const revealLetter = () => {
        if (hints > 0) {
            setInput(word.substring(0, 2) + "_".repeat(word.length - 2));
            setHints(hints - 1);
        } else {
            Alert.alert("❌ No More Hints!");
        }
    };

    return (
        <View style={styles.container}>
            <Text style={styles.title}>Spell the Word:</Text>
            <Text style={styles.word}>{word[0]} _ _ _</Text>
            <Text style={styles.timer}>⏳ Time Left: {timeLeft}s</Text>
            <TextInput 
                style={styles.input} 
                value={input} 
                onChangeText={setInput} 
                autoCapitalize="none"
                placeholder="Type your answer..."
            />
            <Button mode="contained" icon="check" onPress={checkAnswer} style={styles.button}>
                Check
            </Button>
            <Button mode="outlined" icon="exit-to-app" onPress={endGame} style={styles.button}>
                End Game
            </Button>
            <Button 
                mode="contained" 
                icon="trophy" 
                onPress={() => navigation.navigate("Leaderboard")} 
                style={styles.button}
            >
                View Leaderboard
            </Button>
            <Button 
                mode="contained" 
                icon="star" 
                onPress={checkDailyChallenge} 
                style={styles.button}
            >
                Daily Challenge
            </Button>
            <Button 
                mode="contained" 
                icon="account-multiple" 
                onPress={() => createGame("Player1")} 
                style={styles.button}
            >
                Challenge Friend
            </Button>
            <Button 
                mode="contained" 
                icon="lightbulb" 
                onPress={revealLetter} 
                style={styles.button}
            >
                Reveal Letter ({hints} left)
            </Button>
            <Animated.Text style={[styles.feedback, { opacity: fadeAnim }]}>
                ✅ Correct! Streak: {streak}
            </Animated.Text>
        </View>
    );
}

const styles = StyleSheet.create({
    container: { flex: 1, justifyContent: "center", alignItems: "center", padding: 20, backgroundColor: "#f4f4f4" },
    title: { fontSize: 26, fontWeight: "bold", marginBottom: 10 },
    word: { fontSize: 30, fontWeight: "bold", marginBottom: 20, color: "blue" },
    timer: { fontSize: 18, marginBottom: 10, color: "red" },
    input: { borderWidth: 1, padding: 10, margin: 10, width: "80%", borderRadius: 5, backgroundColor: "white" },
    button: { marginVertical: 10, width: "80%" },
    feedback: { fontSize: 20, fontWeight: "bold", marginTop: 10, color: "green" },
});