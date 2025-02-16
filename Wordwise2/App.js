import React from "react";
import { NavigationContainer } from "@react-navigation/native";
import { createStackNavigator } from "@react-navigation/stack";
import GameScreen from "./screens/GameScreen";
import Leaderboard from "./screens/Leaderboard";

const Stack = createStackNavigator();

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator>
        <Stack.Screen name="Game" component={GameScreen} />
        <Stack.Screen name="Leaderboard" component={Leaderboard} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}
