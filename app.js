const chatBody = document.querySelector(".chat-body");
const txtInput = document.querySelector("#text_input");
const send = document.querySelector(".send_button");
const chatToggler = document.querySelector(".chatbot-toggler");

send.addEventListener("click", () => renderUserMessage());

txtInput.addEventListener("keyup", (event) => {
  if (event.keyCode === 13) {
    renderUserMessage();
  }
});

const intents = [
  {
    "tag": "greeting",
    "patterns": [
      "Hi",
      "Hey",
      "How are you",
      "Is anyone there?",
      "Hello",
      "Good day"
    ],
    "responses": [
      "Hey :-)",
      "Hello, thanks for visiting",
      "Hi there, what can I do for you?",
      "Hi there, how can I help?"
    ]
  },
  {
    "tag": "goodbye",
    "patterns": ["Bye", "See you later", "Goodbye"],
    "responses": [
      "See you later, thanks for visiting",
      "Have a nice day",
      "Bye! Come back again soon."
    ]
  },
  {
    "tag": "thanks",
    "patterns": ["Thanks", "Thank you", "That's helpful", "Thank's a lot!"],
    "responses": ["Happy to help!", "Any time!", "My pleasure"]
  },
  {
    "tag": "items",
    "patterns": [
      "Which items do you have?",
      "What kinds of items are there?",
      "What do you sell?"
    ],
    "responses": [
      "We sell coffee and tea",
      "We have coffee and tea"
    ]
  },
  {
    "tag": "payments",
    "patterns": [
      "Do you take credit cards?",
      "Do you accept Mastercard?",
      "Can I pay with Paypal?",
      "Are you cash only?"
    ],
    "responses": [
      "We accept VISA, Mastercard and Paypal",
      "We accept most major credit cards, and Paypal"
    ]
  },
  {
    "tag": "delivery",
    "patterns": [
      "How long does delivery take?",
      "How long does shipping take?",
      "When do I get my delivery?"
    ],
    "responses": [
      "Delivery takes 2-4 days",
      "Shipping takes 2-4 days"
    ]
  },
  {
    "tag": "funny",
    "patterns": [
      "Tell me a joke!",
      "Tell me something funny!",
      "Do you know a joke?"
    ],
    "responses": [
      "Why did the hipster burn his mouth? He drank the coffee before it was cool.",
      "What did the buffalo say when his son left for college? Bison."
    ]
  }
];

const renderUserMessage = () => {
  const userInput = txtInput.value;
  renderMessageEle(userInput, "user");
  txtInput.value = "";
  setTimeout(() => {
    renderChatbotResponse(userInput);
    setScrollPosition();
  }, 500);
};

const renderChatbotResponse = (userInput) => {
  const chatbotResponse = getChatbotResponse(userInput);
  renderMessageEle(chatbotResponse, "chatbot");
};

const renderMessageEle = (txt, type) => {
  let className = "user-message";
  const messageEle = document.createElement("div");
  const txtNode = document.createTextNode(txt);
  messageEle.appendChild(txtNode);
  if (type !== "user") {
    className = "chatbot-message";
    messageEle.classList.add(className);
    const botResponseContainer = document.createElement("div");
    botResponseContainer.classList.add("bot-response-container");
    const botImg = document.createElement("img");
    botImg.setAttribute("src", "chatbot (1).png")
    botImg.setAttribute("width", "30px");
    botImg.setAttribute("height", "30px");
    botResponseContainer.appendChild(botImg)
    botResponseContainer.appendChild(messageEle)
    chatBody.appendChild(botResponseContainer)
  } else {
    messageEle.classList.add(className);
    chatBody.appendChild(messageEle);
  }
};

const getChatbotResponse = (userInput) => {
  // Find the intent that matches the user input
  const intent = intents.find((intent) =>
    intent.patterns.some((pattern) =>
      userInput.toLowerCase().includes(pattern.toLowerCase())
    )
  );

  // If an intent is found, return a random response from that intent; otherwise, return a default response
  if (intent) {
    const responses = intent.responses;
    const randomResponse =
      responses[Math.floor(Math.random() * responses.length)];
    return randomResponse;
  } else {
    return "Please try something else";
  }
};

const setScrollPosition = () => {
  if (chatBody.scrollHeight >= 400) {
    chatBody.scrollTop = chatBody.scrollHeight;
  }
};

chatToggler.addEventListener("click", () => {
  document.body.classList.toggle("show-chatbot");
});
