import pygame
import tkinter as tk
from tkinter import ttk
from PIL import Image, ImageTk
import time
from mutagen.mp3 import MP3

pygame.init()

# initialize a list to store the songs in the playlist
playlist = [("song1.mp3", "Song 1", "Artist 1", "album1.jpg"), 
            ("song2.mp3", "Song 2", "Artist 2", "album2.jpg"), 
            ("song3.mp3", "Song 3", "Artist 3", "album3.jpg")]

#start the music player with the firstsong in the playlist
current_song = 0
pygame.mixer.music.load(playlist[current_song][0])
pygame.mixer.music.play()

#create the main window for the music player
root = tk.Tk()
root.title("Music Player")
root.geometry("800x400")

# function to handle the play button
def play_song():
    pygame.mixer.music.unpause()
    play_button.config(state="disable")
    pause_button.config(state="normal")
    

# function to handle the pause button
def pause_song():
    pygame.mixer.music.pause()
    pause_button.config(state="disable")
    play_button.config(state="normal")
    

# function to handle the next button
def next_song():
    global current_song
    current_song += 1
    if current_song >= len(playlist):
        current_song = 0
    pygame.mixer.music.load(playlist[current_song][0])
    pygame.mixer.music.play()
    play_button.config(state="disable")
    pause_button.config(state="normal")
    update_song_info()

# function to handle the previous button
def previous_song():
    global current_song
    current_song -= 1
    if current_song < 0:
        current_song = len(playlist) - 1
    pygame.mixer.music.load(playlist[current_song][0])
    pygame.mixer.music.play()
    play_button.config(state="disable")
    pause_button.config(state="normal")
    update_song_info()

# function to update the song info
def update_song_info():

    song_title.config(text=playlist[current_song][1])
    song_artist.config(text=playlist[current_song][2])
    audio = MP3(playlist[current_song][0])
    song_l = audio.info.length
    song_time.config(text=(str(song_l/100)[:4])+" minutes")
    album_cover = ImageTk.PhotoImage(Image.open(playlist[current_song][3]))
    album_cover_label.config(image=album_cover)
    album_cover_label.image = album_cover

#create the play button
play_button = tk.Button(root, text="Play", command=play_song,state="disabled")
play_button.pack(side="left")

#create the pause button
pause_button = tk.Button(root, text="Pause", command=pause_song, state="normal")
pause_button.pack(side="left")


#create the next button
next_button = tk.Button(root, text="Next", command=next_song)
next_button.pack(side="right")

#create the previous button
previous_button = tk.Button(root, text="Previous", command=previous_song)
previous_button.pack(side="right")
import time



#create progress bar
progress_bar = ttk.Progressbar(root, orient="horizontal", length=500, mode="determinate")
progress_bar.pack()

# update the progress bar
def update_progress_bar():
    while True:
        time.sleep(1)
        if pygame.mixer.music.get_busy():
            progress_bar["value"] = (pygame.mixer.music.get_pos() / 1000)
            progress_bar.update()
        else:
            progress_bar["value"] = 0

# set the maximum value of the progress bar based on the length of the song
audio = MP3(playlist[current_song][0])
song_length = audio.info.length
progress_bar["maximum"] = song_length

# start a new thread to update the progress bar
from threading import Thread
t = Thread(target=update_progress_bar)
t.start()




#create volume control slider
def set_volume(val):
    volume = float(val)
    pygame.mixer.music.set_volume(volume)

volume_slider = tk.Scale(root, from_=0, to=1, resolution=0.1, orient="horizontal", label="Volume", command=set_volume)
volume_slider.set(1)
pygame.mixer.music.set_volume(1)
volume_slider.pack()



#create song info
song_title = tk.Label(root, text=playlist[current_song][1])
song_title.pack()
song_artist = tk.Label(root, text=playlist[current_song][2])
song_artist.pack()
song_time = tk.Label(root, text=(str((MP3(playlist[current_song][0]).info.length)/100)[:4])+" minutes")
song_time.pack()
album_cover = ImageTk.PhotoImage(Image.open(playlist[current_song][3]))
album_cover_label = tk.Label(root, image=album_cover)
album_cover_label.pack()



# start the main loop for the GUI
root.mainloop()
