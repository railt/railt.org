namespace App

type Message {
    id: ID!
    from: User!
}

type Email/Message {
    id: ID!
    from: Email!
}
