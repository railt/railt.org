@use(class: "App\\Controller\\UsersController")

type Query {
    users: [User!]!
        @route(action: "UsersController")
}

type User {
    # ...
}
