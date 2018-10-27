interface Response {
    message: Any
}

type AnswerResponse implements Response {
    message: String! # Overloaded by String!
}

type DateResponse implements Response {
    message: DateTime! # Overloaded by DateTime!
}
