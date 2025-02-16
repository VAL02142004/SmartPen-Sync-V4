import React, { useEffect, useState } from "react";
import { View, Text, Button, Image, TextInput, StyleSheet, Alert } from "react-native";
import { getProfile, saveProfile } from "../utils/profileManager";

export default function ProfileScreen() {
  const [profile, setProfile] = useState({ name: "", avatar: "", badges: [] });

  useEffect(() => {
    getProfile().then(setProfile);
  }, []);

  const handleSave = () => {
    saveProfile(profile);
    Alert.alert("✅ Profile Saved!", "Your changes have been updated.");
  };

  return (
    <View style={styles.container}>
      <Image source={{ uri: profile.avatar }} style={styles.avatar} />
      <Text style={styles.label}>Username:</Text>
      <TextInput
        style={styles.input}
        value={profile.name}
        onChangeText={(text) => setProfile({ ...profile, name: text })}
      />
      <Button title="Save Profile" onPress={handleSave} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, alignItems: "center", padding: 20, backgroundColor: "#f5f5f5" },
  avatar: { width: 100, height: 100, borderRadius: 50, marginBottom: 10 },
  label: { fontSize: 18, fontWeight: "bold", marginBottom: 5 },
  input: { borderWidth: 1, width: "80%", padding: 10, marginBottom: 10, borderRadius: 5 },
});
