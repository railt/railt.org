type AbstractUser {
    name: String!
}

type User extends AbstractUser {
    email: Email!
}

type Friend extends AbstractUser {
    parent: User!
}
