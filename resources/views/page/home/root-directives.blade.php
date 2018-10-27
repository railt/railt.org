@use(
    class: "App\\Validator\\EmailValidator"
    as: "Email"
)

type User {
    email: Email!
        @validate(use: "Email")
}
