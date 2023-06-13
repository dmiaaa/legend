import tkinter as tk

root = tk.Tk()
root.title("Automatic Username")

label_frame = tk.LabelFrame(root,text="Username Suggestion")
label_frame.pack(padx=50,pady=50)

name1_label = tk.Label(label_frame,text="First Name: ")
name1_label.grid(row=0, column=0)
name1_entry = tk.Entry(label_frame)
name1_entry.grid(row=0, column=1)

name2_label = tk.Label(label_frame,text="Second Name: ")
name2_label.grid(row=1, column=0)
name2_entry = tk.Entry(label_frame)
name2_entry.grid(row=1, column=1)

result_label = tk.Label(label_frame,text="Suggested:")
result_label.grid(row=2,column=0)
result_entry =tk.Entry(label_frame)
result_entry.grid(row=2, column=1)
 
def combine_name():
    name1 = str(name1_entry.get())
    name2 = str(name2_entry.get())
    result = name1 + name2
    result_entry.config(state="normal")
    result_entry.delete(0,tk.END)
    result_entry.insert(0,str(result)+"@gmail.com")
    result_entry.config(state="disabled")
combine_button = tk.Button(label_frame, text="Combine", command=combine_name)
combine_button.grid(row=3, column=0)

def clear_entry():
    name1_entry.delete(0,tk.END)
    name2_entry.delete(0,tk.END)
    result_entry.config(state="normal")
    result_entry.delete(0,tk.END)
    result_entry.config(state="disabled")
clear_button = tk.Button(label_frame,text="Clear", command=clear_entry)
clear_button.grid(row=3, column=1)

exit_button = tk.Button(root, text="Exit", command=root.destroy)
exit_button.pack(side="top", padx=10, pady=10)

root.mainloop()