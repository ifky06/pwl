<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('template');
    }

    public function product()
    {
        echo "<ul>
                <li>
                    <a href='https://www.educastudio.com/category/marbel-edu-games'>Product 1</a>
                </li>
                <li>
                    <a href='https://www.educastudio.com/category/marbel-and-friends-kids-games'>Product 2</a>
                </li>
                <li>
                    <a href='https://www.educastudio.com/category/riri-story-books'>Product 3</a>
                </li>
                <li>
                    <a href='https://www.educastudio.com/category/kolak-kids-songs'>Product 4</a>
                </li>
            </ul>";
    }

    public function news($param)
    {
        echo "<h1>News page number ".$param."</h1>
            <ul>
                <li>
                    <a href='https://www.educastudio.com/news'>News 1</a>
                </li>
                <li>
                    <a href='https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitar-terdampak-covid-19'>News 2</a>
                </li>
            </ul>";
    }

    public function program()
    {
        echo "<ul>
                <li>
                    <a href='https://www.educastudio.com/program/karir'>Program 1</a>
                </li>
                <li>
                    <a href='https://www.educastudio.com/program/magang'>Program 2</a>
                </li>
                <li>
                    <a href='https://www.educastudio.com/program/kunjungan-industri'>Program 3</a>
                </li>
            </ul>";
    }

    public function about()
    {
        echo "<h1>ABOUT</h1>
            <p>Website ini dibuat untuk memenuhi tugas mata kuliah Pemrograman Web Lanjut</p>
            <a href='https://www.educastudio.com/about-us'>About us</a>";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "<h1>contact Page</h1>";
        echo "
        <form action='contact' method='POST'>
            <input type='hidden' name='_token' value='402OqlSBMMqpaEDa1cbxdI3fwYjU9FD8uWcLxCav'>
            <input type='submit' value='Contact Us'>
        </form>
        ";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "<h1>contact Us</h1>
        <a href='https://www.educastudio.com/about-us'>contact us</a>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
