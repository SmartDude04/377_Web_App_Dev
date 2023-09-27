function testArray(){
    
    let grades = [79, 53, 74, 24, 56, 99];
    
    document.getElementById("grades").innerHTML = "Your grades are: " + grades;

    total = 0;

    for(let i = 0; i < grades.length; i++){
        total += grades[i];
    }

    let average = total / grades.length;
    document.getElementById("average").innerHTML = "Average is: " + Math.round(average);
}

function dealCard() {
    let deck = getDeckOfCards();

    let card = deck[Math.floor(Math.random() * deck.length)];

    document.getElementById("card").innerHTML = "Your card is the " + card.rank + " of " + card.suit;

}

function getDeckOfCards() {

    let deck = [];
    
    for(let rank = 1; rank <= 13; rank++) {
        let suitText;
        
        for(let suit = 1; suit <= 4; suit++) {

            if (suit == 1) {
                suitText = "Hearts";
            } else if(suit == 2) {
                suitText = "Clubs";
            } else if(suit == 3) {
                suitText = "Spades";
            } else if(suit == 4) {
                suitText = "Diamonds";
            }

            let card = { rank: rank, suit: suitText };
            deck.push(card);
        }
        
    }

    return deck;

}