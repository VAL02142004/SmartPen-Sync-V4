import firestore from "@react-native-firebase/firestore";

export const createGame = async (player1) => {
  const gameRef = await firestore().collection("games").add({
    player1,
    player2: null,
    word: "apple",
    winner: null,
  });
  return gameRef.id;
};

export const joinGame = async (gameId, player2) => {
  await firestore().collection("games").doc(gameId).update({ player2 });
};

