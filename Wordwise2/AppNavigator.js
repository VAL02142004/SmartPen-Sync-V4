import React from "react";
import { createStackNavigator } from "@react-navigation/stack";
import { NavigationContainer } from "@react-navigation/native";
import HomeScreen from "../screens/HomeScreen";
import GameScreen from "../screens/GameScreen";
import ProfileScreen from "../screens/ProfileScreen";  // 👈 Add ProfileScreen here

const Stack = createStackNavigator();

export default function AppNavigator() {
  return (
    <NavigationContainer>
      <Stack.Navigator>
        <Stack.Screen name="Home" component={HomeScreen} />
        <Stack.Screen name="Game" component={GameScreen} />
        <Stack.Screen name="Profile" component={ProfileScreen} />  {/* 👈 Add ProfileScreen */}
      </Stack.Navigator>
    </NavigationContainer>
  );
}
