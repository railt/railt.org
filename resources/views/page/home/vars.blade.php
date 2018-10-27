
const $query = Query,
      $mutation = Mutation

schema {
    query: $query
        @@include(if: $query)

    mutation: $mutation
        @@include(if: $mutation)
}
