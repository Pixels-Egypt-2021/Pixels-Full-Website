import React from 'react'

export default function ShowMemberData() {
    return (
        <div className="container">
            <div className="row">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">phone</th>
                        <th scope="col">email</th>
                        <th scope="col">university</th>
                        <th scope="col">academic year</th>
                        <th scope="col">course one</th>
                        <th scope="col">course two</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>mohamed abdel Samie</td>
                        <td>01111346560</td>
                        <td>mohamed.abdelsamie3009@gmail</td>
                        <td>hellwan</td>
                        <td>2sec</td>
                        <td>web</td>
                        <td>python</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    )
}

