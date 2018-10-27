type Query {
    users: Pagination<items: User>!
    messages: Pagination<items: Message>!
}

type Pagination<items: Object> {
    items: [$items!]!
    perPage: Int!
    count: Int!
    page: Int!
}
